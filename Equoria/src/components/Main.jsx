import { Outlet, NavLink, useNavigate } from 'react-router-dom';
import api from '../api/axios'; // Para manejar el cierre de sesión
import Sidebar from './SideBar';

export default function MainLayout() {
    const navigate = useNavigate();

    const handleLogout = async () => {
        try {
            await api.post('/logout'); 
        } catch (error) {
            console.error("Error al cerrar sesión", error);
        } finally {
            localStorage.removeItem('token');
            navigate('/login');
        }
    };

    return (
        <>
           <SideBar/>
            <div className="main">
                <header className="topbar">
                    <div className="topbar-title"></div>
                    <div className="topbar-actions">
                        <div className="topbar-icon-btn">
                            <i className="fa-solid fa-bell"></i>
                            <div className="notif-dot"></div>
                        </div>
                        <div className="topbar-icon-btn">
                            <i className="fa-regular fa-clipboard"></i>
                        </div>
                        <div className="avatar-btn">AD</div>
                    </div>
                </header>
                
                <main className="content">
                    <Outlet />
                </main>
            </div>
        </>
    );
}