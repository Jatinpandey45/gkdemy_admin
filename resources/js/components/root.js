
import React from 'react';
import ReactDOM from 'react-dom';
import { Provider } from 'react-redux';
import { createStore, applyMiddleware, compose } from 'redux';
import thunk from 'redux-thunk';
// import './index.css';
// import App from './App';
import * as serviceWorker from '../theme/src/serviceWorker';
import App from '../theme/src/components/App'
import reducers from '../theme/src/reducers';

const composeEnhancers = window.__REDUX_DEVTOOLS_EXTENSION_COMPOSE__ || compose;
const store = createStore(reducers, composeEnhancers(applyMiddleware(thunk)));

if (document.getElementById("root")) {
    const rootElement = document.getElementById("root");
    ReactDOM.render(
        <Provider store={store} >
            <App />
        </Provider>,
        rootElement
    );
}
// if (rootElement.hasChildNodes()) {
//     ReactDOM.hydrate(
//         <Provider store={store} >
//             <App />
//         </Provider>,
//         rootElement
//     );
// } else {
    // render(<App />, rootElement);
    // ReactDOM.render(
    //     <Provider store={store} >
    //         <App />
    //     </Provider>,
    //     rootElement
    // );
// }

// If you want your app to work offline and load faster, you can change
// unregister() to register() below. Note this comes with some pitfalls.
// Learn more about service workers: https://bit.ly/CRA-PWA
serviceWorker.register();

