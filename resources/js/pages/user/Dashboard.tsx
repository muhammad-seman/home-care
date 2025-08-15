import React from 'react'
import { useAuth } from '@/hooks/useAuth'

const Dashboard: React.FC = () => {
  const { user } = useAuth()

  return (
    <div className="space-y-6">
      <div className="card">
        <h1 className="text-2xl font-bold text-gray-900 mb-4">
          Welcome to Home Care Marketplace
        </h1>
        <p className="text-gray-600">
          Hello {user?.name}! You are logged in as a <strong>{user?.role}</strong>.
        </p>
      </div>

      {user?.role === 'user' && (
        <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
          <div className="card">
            <h3 className="text-lg font-semibold mb-2">Find Bidan</h3>
            <p className="text-gray-600 mb-4">
              Search for qualified healthcare providers near you
            </p>
            <button className="btn-primary">
              Browse Bidans
            </button>
          </div>

          <div className="card">
            <h3 className="text-lg font-semibold mb-2">My Orders</h3>
            <p className="text-gray-600 mb-4">
              View your booking history and current appointments
            </p>
            <button className="btn-secondary">
              View Orders
            </button>
          </div>

          <div className="card">
            <h3 className="text-lg font-semibold mb-2">Favorites</h3>
            <p className="text-gray-600 mb-4">
              Your saved healthcare providers
            </p>
            <button className="btn-secondary">
              View Favorites
            </button>
          </div>
        </div>
      )}

      {user?.role === 'bidan' && (
        <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
          <div className="card">
            <h3 className="text-lg font-semibold mb-2">My Profile</h3>
            <p className="text-gray-600 mb-4">
              Manage your professional profile and services
            </p>
            <button className="btn-primary">
              Edit Profile
            </button>
          </div>

          <div className="card">
            <h3 className="text-lg font-semibold mb-2">Orders</h3>
            <p className="text-gray-600 mb-4">
              View and manage your client appointments
            </p>
            <button className="btn-secondary">
              View Orders
            </button>
          </div>

          <div className="card">
            <h3 className="text-lg font-semibold mb-2">Analytics</h3>
            <p className="text-gray-600 mb-4">
              Track your performance and earnings
            </p>
            <button className="btn-secondary">
              View Analytics
            </button>
          </div>
        </div>
      )}

      {user?.role === 'admin' && (
        <div className="grid grid-cols-1 md:grid-cols-4 gap-6">
          <div className="card">
            <h3 className="text-lg font-semibold mb-2">Users</h3>
            <p className="text-gray-600 mb-4">
              Manage platform users
            </p>
            <button className="btn-primary">
              Manage Users
            </button>
          </div>

          <div className="card">
            <h3 className="text-lg font-semibold mb-2">Bidans</h3>
            <p className="text-gray-600 mb-4">
              Verify and manage healthcare providers
            </p>
            <button className="btn-secondary">
              Manage Bidans
            </button>
          </div>

          <div className="card">
            <h3 className="text-lg font-semibold mb-2">Services</h3>
            <p className="text-gray-600 mb-4">
              Configure available services
            </p>
            <button className="btn-secondary">
              Manage Services
            </button>
          </div>

          <div className="card">
            <h3 className="text-lg font-semibold mb-2">Analytics</h3>
            <p className="text-gray-600 mb-4">
              Platform performance metrics
            </p>
            <button className="btn-secondary">
              View Analytics
            </button>
          </div>
        </div>
      )}
    </div>
  )
}

export default Dashboard