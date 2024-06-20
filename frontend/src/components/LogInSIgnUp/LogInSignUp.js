import React, { useState } from 'react';
import axios from 'axios';
import './LogInSignUp.css';

import user_icon from '../Assets/person.png';
import email_icon from '../Assets/email.png';
import password_icon from '../Assets/password.png';

const LogInSignUp = () => {
    const [action, setAction] = useState("Sign Up");
    const [username, setUsername] = useState("");
    const [email, setEmail] = useState("");
    const [password1, setPassword1] = useState("");
    const [password, setPassword] = useState("");
    const [password2, setpassword2] = useState(""); // Added state for password confirmation

    const handleSignUp = async () => {
        try {
            const response = await axios.post('http://127.0.0.1:8000/api/v1/accounts/registration/', {
                username,
                email,
                password1,
                password2,
            });
            if (response.status === 200) {
                window.location.href = 'https://www.google.com';
            }
            console.log(response.data); // handle success response
            console.log(`Username: ${username}`); // handle success response
        } catch (error) {
            console.error(error); // handle error
        }
    };

    const handleLogin = async () => {
        try {
            const response = await axios.post('http://127.0.0.1:8000/api/v1/accounts/login/', {
                username,
                email,
                password,
            });
            if (response.status === 200) {
                window.location.href = 'https://www.google.com';
            }
            console.log(response.data); // handle success response
        } catch (error) {
            console.error(error); // handle error
        }
    };

    return (
        <div className="container">
            <div className="header">
                <div className="text">{action}</div>
                <div className='underline'></div>
            </div>
            <div className='inputs'>
                
                
                {action === "Login" && ( // Conditionally render password confirmation field
                    <div className='inputs'>
                        <div className='input'>
                            <img src={user_icon} alt="/" />
                            <input type="text" placeholder='User Name' onChange={(e) => setUsername(e.target.value)} />
                        </div>
                        <div className='input'>
                            <img src={email_icon} alt="/" />
                            <input type="email" placeholder='Email Id' onChange={(e) => setEmail(e.target.value)} />
                        </div>
                        <div className='input'>
                            <img src={password_icon} alt="/" />
                            <input type="password" placeholder='Password' onChange={(e) => setPassword(e.target.value)} />
                        </div>
                    </div>
                    
                )}
                {action === "Sign Up" && ( // Conditionally render password confirmation field
                    <div className='inputs'>
                        <div className='input'>
                            <img src={user_icon} alt="/" />
                            <input type="text" placeholder='User Name' onChange={(e) => setUsername(e.target.value)} />
                        </div>
                        <div className='input'>
                            <img src={email_icon} alt="/" />
                            <input type="email" placeholder='Email Id' onChange={(e) => setEmail(e.target.value)} />
                        </div>
                        <div className='input'>
                            <img src={password_icon} alt="/" />
                            <input type="password" placeholder='Password' onChange={(e) => setPassword1(e.target.value)} />
                        </div>
                        <div className='input'>
                            <img src={password_icon} alt="/" />
                            <input type="password" placeholder='Confirm Password' onChange={(e) => setpassword2(e.target.value)} /> <br/>
                        </div>
                    </div>
                )}
            </div>
            {action === "Sign Up" ? null : <div className="forgot-password">Forgot password?<span>Click here</span></div>}

            <div className="submit-container">
                {/* dynamic assignment of class names */}
                <div className={action === "Sign Up" ? "submit gray" : "submit"} onClick={() => { handleSignUp(); setAction("Sign Up") }}>Sign Up</div>
                
                <div className={action === "Login" ? "submit gray" : "submit"} onClick={() => { handleLogin(); setAction("Login") }}>Log In</div>
            </div>
        </div>
    );
};

export default LogInSignUp;
