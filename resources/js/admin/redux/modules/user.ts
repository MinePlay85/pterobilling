/**
 * User module store will allow us to share user data through the whole application
 */

import { UserInfo } from '../../../typings'

interface Action<T extends string> {
  type: T
}

interface ActionWithPayload<T extends string, P extends unknown> extends Action<T> {
  payload: P
}

export function typedAction<T extends string>(type: T): { type: T }
export function typedAction<T extends string, P extends unknown>(
  type: T,
  payload: P
): { type: T; payload: P }
export function typedAction(
  type: string,
  payload?: unknown
): Action<string> | ActionWithPayload<string, unknown> {
  return { type, payload }
}

export interface UserState {
  user?: UserInfo
  isLoggedIn: boolean
}

const initialState: UserState = {
  user: undefined,
  isLoggedIn: false,
}

export function login(u: UserInfo): ActionWithPayload<'user/LOGIN', typeof u> {
  return typedAction('user/LOGIN', u)
}
export function logout(): Action<'user/LOGOUT'> {
  return typedAction('user/LOGOUT')
}

type UserAction = ReturnType<typeof login | typeof logout>

export function userReducer(state = initialState, action: UserAction): UserState {
  switch (action.type) {
    case 'user/LOGIN':
      return {
        ...state,
        user: action.payload,
        isLoggedIn: true,
      }
    case 'user/LOGOUT':
      return {
        ...state,
        user: undefined,
        isLoggedIn: false,
      }
    default:
      return state
  }
}
