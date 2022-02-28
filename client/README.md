## Users API documentation

### Fetch all users Function :
```
  useEffect(() => {
    async function fetchData() {
      const result = await axios('http://127.0.0.1:8000/api/users');
        console.log(result.data.users);
    }
    fetchData();
  }, []);
```
Response:
```
"200": "OK",
"users": [
  {
        "id": 1,
        "first_name": "abood",
        "last_name": "abood",
        "email": "abood@address.com",
        "social": "irbid",
        "address": "irbid",
        "last_login": "2022-02-26 13:48:28",
        "is_admin": 1,
        "created_at": "2022-02-26T13:48:28.000000Z",
        "updated_at": "2022-02-26T14:31:56.000000Z"
  },
 ]
}
```

### Fetch user by id Function :
```
  useEffect(() => {
    async function fetchData() {
      const result = await axios('http://127.0.0.1:8000/api/users/1');
        console.log(result.data.users);
    }
    fetchData();
  }, []);
```


