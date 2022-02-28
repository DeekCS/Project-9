import React,{useEffect,useState} from 'react';
import axios from 'axios';
export  default  function Users(){
    const [users,setUsers]=useState([]);
    const [loading,setLoading]=useState(true);
    const [error,setError]=useState(false);
    useEffect(()=>{
        const fetchData=async()=>{
            try{
                const result=await axios.get('http://127.0.0.1:8000/api/users/');
                setUsers(result.data);
                setLoading(false);
            }catch(error){
                setError(true);
            }
        }
        fetchData().then(r =>
            console.log(r)
        );
    },[]);

    return(
        <div>
            <h1>Users</h1>
            {loading === false&& <ul>
                {users.map(user=>(
                    <li key={user.id}>{user.first_name}</li>
                ))}
            </ul> }<div>

            </div>}
            {error && <div>Error...</div>}

        </div>
    );
}

