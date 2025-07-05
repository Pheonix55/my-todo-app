import { Routes, Route, Navigate } from "react-router-dom";

import CreateTodo from "./pages/CreateTodo";
import EditTodo from "./pages/EditTodo";
import ViewTodos from "./pages/ViewTodo";

import Navbar from "./components/Navbar";
import Sidebar from "./components/Sidebar";
import "./styles/app.css";
function App() {
  return (
    <div className="main-layout-app">
      <div className="sidebar-main">
        <Sidebar />
      </div>
      <div className="navbar-main">
        <Navbar />
        <div className="main-body">
          <main style={{ padding: "1rem" }}>
            <Routes>
              <Route path="/" element={<Navigate to="/todos" />} />
              <Route path="/todos" element={<ViewTodos />} />
              <Route path="/todos/create" element={<CreateTodo />} />
              <Route path="/todos/edit/:id" element={<EditTodo />} />
            </Routes>
          </main>
        </div>
      </div>
    </div>
  );
}
export default App;
