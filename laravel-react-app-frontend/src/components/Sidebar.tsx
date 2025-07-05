import { useState } from "react";
import "../styles/Sidebar.css";

function Sidebar() {
  const [activeIndex, setActiveIndex] = useState<number | null>(null);

  const items = [
    {
      label: "TODO App",
      icon: "M360-120q-100 0-170-70t-70-170v-240q0-100 70-170t170-70h240q100 0 170 70t70 170v240q0 100-70 170t-170 70H360Zm80-200 240-240-56-56-184 184-88-88-56 56 144 144Zm-80 120h240q66 0 113-47t47-113v-240q0-66-47-113t-113-47H360q-66 0-113 47t-47 113v240q0 66 47 113t113 47Zm120-280Z",
    },
    {
      label: "Create",
      icon: "M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z",
    },
    {
      label: "List",
      icon: "M222-200 80-342l56-56 85 85 170-170 56 57-225 226Zm0-320L80-662l56-56 85 85 170-170 56 57-225 226Zm298 240v-80h360v80H520Zm0-320v-80h360v80H520Z",
    },
    {
      label: "Create",
      icon: "M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z",
    },
    {
      label: "Create",
      icon: "M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z",
    },
    {
      label: "Create",
      icon: "M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z",
    },
  ];

  return (
    <aside>
      <div className="sidebar_left">
        <ul className="sidebar_inner">
          {items.map((item, index) => (
            <li key={index}>
              <div
                className={`sidebar_item ${
                  index === activeIndex ? "active_sidebar_item" : ""
                } ${index === 0 ? "title" : ""}`}
                onClick={() => setActiveIndex(index)}
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  height="24px"
                  viewBox="0 -960 960 960"
                  width="24px"
                  fill="#1f1f1f"
                >
                  <path d={item.icon} />
                </svg>
                <a href="#">{item.label}</a>
              </div>
            </li>
          ))}
        </ul>
      </div>
    </aside>
  );
}

export default Sidebar;
