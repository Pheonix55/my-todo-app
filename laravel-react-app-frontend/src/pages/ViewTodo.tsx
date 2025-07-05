import ListTodo from "../components/ListTodos";

const mockTodos = [
  { id: 1, title: "Learn React", description: "Go through React docs" },
  { id: 2, title: "Build Todo App", description: "Use React + TypeScript" },
];

const ViewTodos = () => {
  return (
    <div>
      <h2>Todo List</h2>
      <ListTodo todos={mockTodos} />
    </div>
  );
};

export default ViewTodos;
