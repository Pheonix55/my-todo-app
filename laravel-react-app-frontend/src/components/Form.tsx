import React, { useState, type FormEvent } from "react";
import "../styles/form.css";

function Form() {
  const [formData, setFormData] = useState({
    title: "",
    description: "",
    isDone: false,
  });

  const handleChange = (
    e: React.ChangeEvent<HTMLInputElement | HTMLTextAreaElement>
  ) => {
    const { name, value, type } = e.target;

    const checked =
      type === "checkbox" || type === "radio"
        ? (e.target as HTMLInputElement).checked
        : undefined;

    setFormData((prev) => ({
      ...prev,
      [name]: type === "checkbox" || type === "radio" ? checked : value,
    }));
  };

  const handleSubmit = (e: FormEvent<HTMLFormElement>) => {
    e.preventDefault(); // prevent default page reload
    console.log("Form Submitted:", formData);
    setFormData({
      title: "",
      description: "",
      isDone: false,
    });
  };

  return (
    <form className="form" onSubmit={handleSubmit}>
      <div className="flex-column">
        <label htmlFor="title">Title</label>
      </div>
      <div className="inputForm">
        <input
          name="title"
          placeholder="Title ..."
          className="input"
          type="text"
          value={formData.title}
          onChange={handleChange}
          required
        />
      </div>

      <div className="flex-column">
        <label htmlFor="description">Description</label>
      </div>
      <div className="inputForm text_area">
        <textarea
          name="description"
          placeholder="Description ..."
          className="input"
          value={formData.description}
          onChange={handleChange}
          required
        />
      </div>

      <div className="flex-row">
        <div>
          <input
            type="radio"
            name="isDone"
            id="remember"
            checked={formData.isDone}
            onChange={handleChange}
          />
          <label htmlFor="remember">Mark Done</label>
        </div>
      </div>

      <button type="submit" className="button-submit">
        Add
      </button>
    </form>
  );
}

export default Form;
