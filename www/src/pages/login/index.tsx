import React, { useState } from 'react';
import { Grid, Paper, FormControlLabel, Checkbox } from '@mui/material';
interface LoginProps {username: string, password: string

}

const Login =() => {
    const [credentials, setCredentials] = useState<LoginProps>({
        username: '',
        password: '',
     });


    return (

        <form onSubmit={()=>{}}>
            <div>
                <label htmlFor="username">Username</label>
                <input type="text" id="username" value={''} onChange={()=>{}} />
            </div>
            <div>
                <label htmlFor="password">Password</label>
                <input type="password" id="password" value={''} onChange={()=>{}} />
            </div>
            <button type="submit">Login</button>
        </form>
    );
};

export default Login;