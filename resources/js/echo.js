import Echo from "laravel-echo";
import Pusher from "pusher-js";

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: "pusher",
    key: import.meta.env.VITE_PUSHER_APP_KEY, // Use the correct key
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER, // Use the correct cluster
    forceTLS: true,
});
