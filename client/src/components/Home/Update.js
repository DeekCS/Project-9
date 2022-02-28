import React, {useState, useEffect} from 'react';
import axios from 'axios';
// import {Link} from 'react-router-dom';
import Swal from 'sweetalert2';
export default function Update() {
    const [usersData, setUsersData] = useState({});
    const [isLoading, setIsLoading] = useState(true);
    const [isError, setIsError] = useState(false);
    const [isSuccess, setIsSuccess] = useState(false);
    const [CreateUser, setCreateUser] = useState({});


    const handleSubmit = async (event) => {
        event.preventDefault();
        try {
            // if get request is successful swal will show success message
            const response = await axios.post(
                'http://127.0.0.1:8000/api/add-user',
                CreateUser
            );            setUsersData(response.data.users);
            setIsLoading(false);
            setIsSuccess(true);
            setIsError(false);
            await Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'User Created Successfully',
                showConfirmButton: false,
                timer: 1500
            });
        } catch (error) {
            // if get request is not successful swal will show error message
            setIsLoading(false);
            setIsError(true);
            setIsSuccess(false);
            await Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Failed to create user!',
                showConfirmButton: false,
                timer: 1500
            });
        }
    };


    const handleChange = (event) => {
        const {name, value} = event.target;
        setCreateUser({...CreateUser, [name]: value});
    };

    return (
        <div>
            <h1>Home</h1>
            <p>
                {isLoading ? (
                    <span>Loading...</span>
                ) : (
                    <span>
                        {isError ? <span>Something went wrong ...</span> : null}
                        {isSuccess ? <span>Success!</span> : null}
                    </span>
                )}
            </p>

            <h2>List of Users</h2>
            {/*<ul>*/}
            {/*    {usersData.map((user) => (*/}
            {/*        <li key={user.id}>*/}
            {/*            <p>First Name :{user.first_name}</p>*/}
            {/*            <p>Last Name :{user.last_name}</p>*/}
            {/*            <p>Email :{user.email}</p>*/}
            {/*            <p>Address : {user.address}</p>*/}
            {/*            <br />*/}
            {/*        </li>*/}
            {/*    ))}*/}
            {/*</ul>*/}
            <hr/>
            <br/>
            <h2>Add User</h2>
            <div className="">
                <form onSubmit={handleSubmit}>
                    <div className="form-group">
                        <label htmlFor="first_name">First Name</label>
                        <input
                            type="text"
                            className="form-control"
                            id="first_name"
                            name="first_name"
                            value={CreateUser.first_name}
                            onChange={handleChange}
                        />
                    </div>
                    <div className="form-group">
                        <label htmlFor="last_name">Last Name</label>
                        <input
                            type="text"
                            className="form-control"
                            id="last_name"
                            name="last_name"
                            value={CreateUser.last_name}
                            onChange={handleChange}
                        />
                    </div>
                    <div className="form-group">
                        <label htmlFor="email">Email</label>
                        <input
                            type="email"
                            className="form-control"
                            id="email"
                            name="email"
                            value={CreateUser.email}
                            onChange={handleChange}
                        />
                    </div>
                    <div className="form-group">
                        <label htmlFor="password">Password</label>
                        <input type="password" className="form-control" id="password" name="password"
                               value={CreateUser.password} onChange={handleChange}
                        />
                    </div>
                    <div className="form-group">
                        <label htmlFor="social">Social</label>
                        <input type="text" className="form-control" id="social" name="social" value={CreateUser.social}
                               onChange={handleChange}
                        />
                    </div>
                    <div className="form-group">
                        <label htmlFor="address">Address</label>
                        <input type="text" className="form-control" id="address" name="address"
                               value={CreateUser.address} onChange={handleChange}
                        />
                    </div>
                    <button type="submit" className="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    );
}

