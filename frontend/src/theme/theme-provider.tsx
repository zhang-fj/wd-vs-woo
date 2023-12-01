// MUI Imports
import {
  BreakpointsOptions,
  createTheme,
  GlobalStyles,
  ScopedCssBaseline,
  ThemeProvider as MuiThemeProvider,
  alpha,
} from "@mui/material";
import { blue, green, grey, red, amber } from "@mui/material/colors";

// Theme Imports
import { shadowsMap } from "./shadowsMap";

// React Imports
import React from "react";

export function ThemeProvider(props: React.PropsWithChildren) {
  // ** Props
  const { children } = props;

  const mode = "light";
  const whiteColor = "#fff";

  const theme = createTheme({
    breakpoints: breakpoints(),
    spacing(abs: number) {
      return `${abs * 0.25}rem`;
    },
    shape: {
      borderRadius: 3,
    },

    shadows: shadowsMap.get(mode),

    palette: {
      mode: "light",
      common: {
        black: "#000",
        white: whiteColor,
      },
      grey: {
        50: "#FAFAFA",
        100: "#F5F5F5",
        200: "#EEEEEE",
        300: "#E0E0E0",
        400: "#BDBDBD",
        500: "#9E9E9E",
        600: "#757575",
        700: "#616161",
        800: "#424242",
        900: "#212121",
        A100: "#F5F5F5",
        A200: "#EEEEEE",
        A400: "#BDBDBD",
        A700: "#616161",
      },

      primary: {
        main: blue[500],
        light: blue[400],
        dark: blue[600],
        contrastText: whiteColor,
      },
      secondary: {
        main: grey[500],
        light: grey[400],
        dark: grey[600],
        contrastText: whiteColor,
      },
      success: {
        main: green[500],
        light: green[400],
        dark: green[600],
        contrastText: whiteColor,
      },
      error: {
        main: red[500],
        light: red[400],
        dark: red[600],
        contrastText: whiteColor,
      },
      warning: {
        main: amber[500],
        light: amber[400],
        dark: amber[600],
        contrastText: whiteColor,
      },
      info: {
        main: grey[500],
        light: grey[400],
        dark: grey[600],
        contrastText: whiteColor,
      },

      divider: alpha(grey[900], 0.12),
    },
  });

  return (
    <MuiThemeProvider theme={theme}>
      <GlobalStyles styles={{}} />
      <ScopedCssBaseline>{children}</ScopedCssBaseline>
    </MuiThemeProvider>
  );
}

function breakpoints(): BreakpointsOptions {
  return {
    keys: ["xs", "sm", "md", "lg", "xl"],
    values: {
      xs: 0,
      sm: 600,
      md: 900,
      lg: 1200,
      xl: 1536,
    },
    unit: "px",
  };
}
