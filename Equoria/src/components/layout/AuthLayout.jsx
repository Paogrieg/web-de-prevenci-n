import React from 'react';
import logoImg from '../../img/logo.png';
export default function AuthLayout({ title, error, footer, children }) {
  return (
    <div className="login-body">
      <div className="login-wrap">
        <div className="login-card">
          
          <div className="login-logo">
            <img src={logoImg} alt="Logo Equoria" />
            <h1>Equoria</h1>
            <p>Plataforma de apoyo</p>
          </div>

          <p className="login-title">{title}</p>

          {error && (
            <div className="login-alert-danger">
              <i className="fa-solid fa-circle-exclamation"></i>
              {error}
            </div>
          )}

          {children}

          {footer && (
            <div className="login-footer">
              {footer}
            </div>
          )}

        </div>
      </div>
    </div>
  );
}