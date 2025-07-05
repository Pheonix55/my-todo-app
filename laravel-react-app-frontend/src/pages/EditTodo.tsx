import { useParams } from "react-router-dom";

const EditTodo = () => {
  const { id } = useParams();

  return (
    <div>
      <h2>Edit Todo ID: {id}</h2>
      {/* Load todo data by ID and pass to form */}
    </div>
  );
};

export default EditTodo;
