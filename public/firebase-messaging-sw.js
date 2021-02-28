// Give the service worker access to Firebase Messaging.
// Note that you can only use Firebase Messaging here. Other Firebase libraries
// are not available in the service worker.
importScripts('https://www.gstatic.com/firebasejs/8.2.9/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.2.9/firebase-messaging.js');

// Initialize the Firebase app in the service worker by passing in
// your app's Firebase config object.
// https://firebase.google.com/docs/web/setup#config-object

firebase.initializeApp({
    apiKey: "AIzaSyCcJPaEusZg6XqOXU-StDlqJQrE83gCUrE",
    authDomain: "streamaccess-73022.firebaseapp.com",
    databaseURL: "https://streamaccess-73022-default-rtdb.firebaseio.com",
    projectId: "streamaccess-73022",
    storageBucket: "streamaccess-73022.appspot.com",
    messagingSenderId: "188738858058",
    appId: "1:188738858058:web:9fd23e10236a75fb9d0ab3",
    measurementId: "G-4WC3GMTYHW"
});

// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();

