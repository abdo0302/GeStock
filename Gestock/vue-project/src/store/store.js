import { createStore } from 'vuex';
import router from '../router/index';
import axios from 'axios';
const store = createStore({
    state: {
       Sidbar:'Users',
       body:'Product',
       errorMessage:''
    },
    mutations: {
        setSidbar(state , value){
            state.Sidbar=value
        },
        setbody(state , value){
            state.body=value
        },
        setError(state , value){
            state.errorMessage=value
        }
        
    },
    actions: {
        //sign up 
       async signUp(context,user){
        user.password_confirmation=user.password
        try {
          const response = await axios.post('http://127.0.0.1:8000/api/register',user);
          sessionStorage.setItem('name', response.data.user.name);
          sessionStorage.setItem('email', response.data.user.email);
          sessionStorage.setItem('token', response.data.token);
          router.push('/dashboard');
        } catch (error) {
            let errorMessage = 'حدث خطأ أثناء إنشاء الحساب. الرجاء المحاولة مرة أخرى.';
            if (error.response && error.response.data && error.response.data.message) {
                errorMessage = error.response.data.message;
            } else if (error.response && error.response.data && typeof error.response.data === 'object') {
                errorMessage = Object.values(error.response.data).join(', ');
            }

            context.commit('setError', errorMessage);
        }
        },
        // log out
        async logOut(context){
            const response = await axios.post(
                'http://127.0.0.1:8000/api/logout',{},
                {
                  headers: {
                    'Authorization': `Bearer ${sessionStorage.getItem('token')}`
                  }
                }
              );
            if (response) {
                sessionStorage.clear();
                context.commit('');
                router.push('/');
            }
            
        }
    },
    getters: {
        getSidebar(state) {
            return state.Sidbar
        },
        getbody(state) {
            return state.body
        }
    }
})
export default store;