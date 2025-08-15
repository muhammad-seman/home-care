export interface User {
  id: number
  name: string
  email: string
  phone: string
  role: 'user' | 'bidan' | 'admin'
  permissions: string[]
  status: 'active' | 'inactive' | 'suspended'
  email_verified_at?: string
  phone_verified_at?: string
}

export interface LoginRequest {
  email: string
  password: string
}

export interface RegisterRequest {
  name: string
  email: string
  phone: string
  password: string
  password_confirmation: string
  role: 'user' | 'bidan'
}

export interface AuthResponse {
  access_token: string
  token_type: string
  user: User
}

export interface ApiResponse<T = any> {
  data?: T
  message?: string
  errors?: Record<string, string[]>
}

export interface Province {
  id: string
  name: string
  code: string
}

export interface Regency {
  id: string
  province_id: string
  name: string
  code: string
}

export interface District {
  id: string
  regency_id: string
  name: string
  code: string
}

export interface Village {
  id: string
  district_id: string
  name: string
}

export interface UserLocation {
  id: number
  user_id: number
  latitude?: number
  longitude?: number
  address?: string
  province_id?: string
  regency_id?: string
  district_id?: string
  is_default: boolean
}