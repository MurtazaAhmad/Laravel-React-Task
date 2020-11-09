import React from 'react';
import ReactDOM from 'react-dom';

function User() {
    return (
        <div className="container">
            <h1>Hello World</h1>
        </div>
    );
}

export default User;

if (document.getElementById('user')) {
    ReactDOM.render(<User/>, document.getElementById('user'));
}
