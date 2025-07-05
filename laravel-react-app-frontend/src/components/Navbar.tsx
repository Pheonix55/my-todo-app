import  { useState } from "react";
import "../styles/Navbar.css";

type NavItem = {
  label: string;
  href: string;
  svgPath: string;
};

const navItems: NavItem[] = [
  {
    label: "Todo's",
    href: "#",
    svgPath:
      "m424-312 282-282-56-56-226 226-114-114-56 56 170 170ZM200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm0-560v560-560Z",
  },
  {
    label: "Todo's",
    href: "#",
    svgPath:
      "m424-312 282-282-56-56-226 226-114-114-56 56 170 170ZM200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm0-560v560-560Z",
  },
  {
    label: "Todo's",
    href: "#",
    svgPath:
      "m424-312 282-282-56-56-226 226-114-114-56 56 170 170ZM200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm0-560v560-560Z",
  },
  {
    label: "Todo's",
    href: "#",
    svgPath:
      "m424-312 282-282-56-56-226 226-114-114-56 56 170 170ZM200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm0-560v560-560Z",
  },
];

function Navbar() {
  const [activeIndex, setActiveIndex] = useState<number | null>(null);

  return (
    <nav className="nav">
      <div className="navbar-nav">
        <ul className="navbar_inner">
          {navItems.map((item, index) => (
            <li className="nav-item" key={index}>
              <div
                className={`nav-item-inner ${
                  index === activeIndex ? "active_nav_item" : ""
                }`}
                onClick={() => setActiveIndex(index)}
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  height="24px"
                  width="24px"
                  viewBox="0 -960 960 960"
                  fill="currentColor"
                >
                  <path d={item.svgPath} />
                </svg>
                <a href={item.href}>{item.label}</a>
              </div>
            </li>
          ))}
        </ul>
      </div>
    </nav>
  );
}

export default Navbar;
